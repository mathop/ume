<?php

    foreach ($data as $row)
    {
        foreach ($row['Contract'] as &$value)
        {
            $value = '"' . $value. '"';
        }

        foreach ($row['Person'] as $key => &$value)
        {
            if ( $key == 'data_de_nascimento' and $value != 'data_de_nascimento' and !empty($value))
            {
                $value = date('d/m/Y', strtotime($value));
            }

            $value = '"' . $value. '"';
        }

        foreach ($row['Point'] as &$value)
        {
            $value = '"' . $value. '"';
        }

        foreach ($row['Course'] as &$value)
        {
            $value = '"' . $value. '"';
        }

        echo 
            implode(';', $row['Contract']) . ';' .
            implode(';', $row['Person']) . ';' .
            implode(';', $row['Point']) . ';' .
            implode(';', $row['Course']) . "\n";
    }

?>
