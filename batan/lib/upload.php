<?php
/*==================================================================
 * 
 * Class upload
 * Author: Arief Hidayatulloh
 * Email : ariefhidayatulloh@gmail.com
 * Blog  : ariefsam.wordpress.com
 *
 * Kelas ini digunakan untuk upload file secara mudah
 * Method/fungsi dalam class ini belum didukung penanganan error,
 * pastikan Anda menggunakannya dengan baik.
 *
 *==================================================================*/

class upload {

    private $config;
    private $result;
    private $post_name;

    //Untuk mengupload, tipe kembalian array result yang isinya name dan ekstension
    function do_upload($post_name, $config=NULL)
    {
        //print_r($_FILES[$post_name]);
        if($_FILES[$post_name])
        {
            $this->post_name    = $post_name;
            $this->config       = $config;
            $this->cek_config();
            $filename           = $this->config['name'];

            if((is_file($this->config['directory'] . $filename)))
            {
                $ex_file    = explode(".", $filename);
                $ekstensi   = $ex_file[count($ex_file)-1];
                $nama_file  = explode(".", $filename,-1);
                $nama_file  = implode(".", $nama_file);
                $filename = $nama_file . time() . "." . $ekstensi;
            }
            
            if($_FILES[$post_name]['error']==0)
            {
                $dest = $this->config['directory'] . $filename;
                $copy = move_uploaded_file($_FILES[$post_name]["tmp_name"], $dest);
                $result = array(
                    "name"      => $filename,
                    "extension" => $ekstensi
                );

                $this->result = $result;
            }
            
            else
            {
                throw new Exception('Error While Uploading');
            }

            return $this->result;
        }
        else return array();
    }

    private function cek_config()
    {
        $config = $this->config;

        //cek directory
        if($config['directory']==NULL)
        {
            $config['directory'] = "./";
        }

        //cek namanya
        if($config['name']==NULL)
        {
            $config['name'] = $_FILES[$this->post_name]['name'];
        }

        //cek writable
        if($config['writable']==NULL)
        {
            $config['writable'] = false;
        }

        $this->config = $config;

    }

}
