<?php 

    foreach ($data as $row) 
    { 

        foreach ($row['Person'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['PersonType'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['Branch'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['Address'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['City'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['Contract'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['EmbarqueIdaPoint'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['DesembarqueIdaPoint'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['EmbarqueVoltaPoint'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        foreach ($row['DesembarqueVoltaPoint'] as &$value) 
        { 
            $value = '"' . $value . '"'; 
        } 

        echo    implode(";", $row['Person']) . ';' .
                implode(";", $row['PersonType']) . ';' .
                implode(";", $row['Branch']) . ';' .
                implode(";", $row['Address']) . ';' .
                implode(";", $row['City']) . ';' .
                implode(";", $row['Contract']) . ';' .
                implode(";", $row['EmbarqueIdaPoint']) . ';' .
                implode(";", $row['DesembarqueIdaPoint']) .';' .
                implode(";", $row['EmbarqueVoltaPoint']) .';' .
                implode(";", $row['DesembarqueVoltaPoint']) . "\n"; 

    } 
?>
