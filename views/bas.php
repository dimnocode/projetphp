<?php

    require 'js/initJS.php';
?>





<footer>
	<p>Par Abe Jean-Michel & Krasucki Dimitri</p>
    <p>
    <?php
        $time = microtime();
        $time = explode(' ', $time);
        $time = $time[1] + $time[0];
        $finish = $time;
        $total_time = round(($finish - $start), 4);
        echo 'Page generated in '.$total_time.' seconds.';
        ?>
        </p>
</footer>
</div>
</body>
</html>