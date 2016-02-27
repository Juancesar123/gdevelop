<?php
for($i=0;$i<count($raw_data);$i++){
	echo"<li>
                        <a href='#'>
                          <i class='fa fa-upload text-aqua'></i>".$raw_data[$i]->first_name." mengupload ".$raw_data[$i]->jenis_share. " 
                        </a>
                      </li>";}
?>
