<?php
  //Author: http://stackoverflow.com/users/184595/crayon-violent
  //Source: http://stackoverflow.com/questions/21322001/php-compare-two-csv-files-look-for-duplicates-and-remove-matching-rows-from-on

  //ini_set('auto_detect_line_endings',TRUE); Enable for problems with Mac compatibility.
  if (($file3 = fopen("output.csv", "w")) !== FALSE) {
    if (($file1 = fopen("dirty.csv", "r")) !== FALSE) {
      while (($file1Row = fgetcsv($file1)) !== FALSE) {
        if (($file2 = fopen("clean.csv", "r")) !== FALSE) {
          while (($file2Row = fgetcsv($file2)) !== FALSE) {
            if ( strtolower(trim($file2Row[0])) == strtolower(trim($file1Row[1])) )
              fputcsv($file3, $file1Row);             
          }
          fclose($file2);
        }
      }
      fclose($file1);
    }
    fclose($file3);
  }
  //ini_set('auto_detect_line_endings',FALSE);
?>