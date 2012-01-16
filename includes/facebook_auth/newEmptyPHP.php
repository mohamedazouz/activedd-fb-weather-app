<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
 $t_xMaker = new COM('ACAWebThumb.ThumbMaker')
    or die("Start ACAWebThumb.ThumbMakerfailed");

  $t_xMaker->SetURL("http://www.webmaster-forums.net");
  if ( 0 == $t_xMaker->StartSnap() )
  {
    // Snap successful, call SetImageFile() to save the image.
    echo "Take screenshot successful." ;
    $t_xMaker->SaveImage("webmaster-forums.png");
  }
?>
