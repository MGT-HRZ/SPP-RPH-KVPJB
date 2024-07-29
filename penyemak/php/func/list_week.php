<?php 

    function svmListWeek() {
        echo '<option id="block" value="">Select Week</option>
        <option value="">==== SVM ====</option>';

        for ($i=1; $i <= 30; $i++) {
            echo '<option value="SVM WEEK '.$i.'">SVM WEEK '.$i .'</option>';
        } 
    }

    function diplomaListWeek() {
        echo '<option id="block" value="">Select Week</option>
        <option value="">==== Diploma ====</option>';

        for ($i=1; $i <= 30; $i++) {
            echo '<option value="DIPLOMA WEEK '.$i.'">DIPLOMA WEEK '.$i .'</option>';
        } 
    }

?>