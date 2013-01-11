<?php
    
    foreach ($data as $row)
    {
        foreach ($row['Person'] as &$value)
        {
            $value = '"' . $value . '"';
        }

        foreach ($row['Course'] as &$value)
        {
            $value = '"' . $value . '"';
        }

        foreach ($row['DesembarqueIdaPoint'] as &$value)
        {
            $value = '"' . $value . '"';
        }

        echo 
            implode(';',$row['Person']) . ';' .
            implode(';',$row['Course']) . ';' .
            implode(';',$row['DesembarqueIdaPoint']) . "\n";
    }
?> 