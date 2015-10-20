<?php
    public function uploadex($type='')
    {
        session_start();

        $config['allowed_types'] = 'pdf|rar|zip|doc|docx|ppt|pptx|xls|xlsx|jpg|jpeg|png|gif|bmp|txt';
        $sub_save_path = 'uploads/file/'.date("Ym/");
        $config['upload_path']   = BASEPATH . '../' . $sub_save_path;

        @mkdir($config['upload_path'], DIR_WRITE_MODE);

        $progress_guid = $this->input->post( $this->upload_progress_name );

        $file_prefix_name = $this->common->gen_guid();

        $this->load->library( 'upload', $config );

        $upload_result = $this->upload->gs_do_upload( "gs_upload_file", $file_prefix_name );

        $post_obj = array( 'guid' => $progress_guid, 'result' => array() );

        if ( !$upload_result )
        {
            $error = $this->upload->display_errors();
            $post_obj["success"] = FALSE;
            $post_obj['msg']     = $error;
        }
        else
        {
            $this->load->database();

            $file_data = array(
                'file_guid'          => $this->common->gen_guid(),
                'store_file_name'    => $upload_result['store_name'],
                'store_path'         => $sub_save_path,
                'original_file_name' => $upload_result["original_name"],
                'file_type'          => $type,
                'source_info'        => json_encode( array( "ip" => $this->input->ip_address() ) )
            );

            $insert_result = $this->db->insert( 'gs_file_ex', $file_data );

            if ( !$insert_result )
            {
                $post_obj["success"] = FALSE;
                log_message( 'error', 'insert into the gs_file error.' . json_encode( $file_data ) );
                $post_obj['msg'] = 'db error.';
            }
            else
            {
                $post_obj['success'] = TRUE;

                $this->load->library( 'fileopr' );

                $post_obj['result']['file_size']          = $this->fileopr->get_file_size( $upload_result['store_name'], '',$sub_save_path );
                $post_obj['result']['file_guid']          = $file_data['file_guid'];
                $post_obj['result']['store_file_name']    = $file_data['store_file_name'];
                $post_obj['result']['original_file_name'] = $file_data['original_file_name'];

            }
        }

        $callback = $this->input->post( 'callback' );
        $this->load->view( 'file/upload_result', array( "data" => $post_obj, 'json2' => site_url( "public/scripts/json2.js" ) ) );
        //$this->load->view( 'restful', array( "data" => $post_obj ,'callback' => $callback) );
    }