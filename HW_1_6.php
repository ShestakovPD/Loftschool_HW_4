<table>
    <?php
    $cols = 10;
    $rows = 10;
    for ($tr = 1; $tr <= $rows; $tr++) {
        echo '<tr>';

        for ($td = 1; $td <= $cols; $td++) {
            if ((($td % 2) == 0) && (($tr % 2) == 0)) {
                $leftB = '(';
                $rightB = ')';// четное
            } elseif ((($td % 2) !== 0) && (($tr % 2) !== 0)) {
                $leftB = '[';
                $rightB = ']';// нечетное
            } else {
                $leftB = '';
                $rightB = '';
            }

            echo '<td>', $leftB, $tr * $td, $rightB, '</td>';
        }

        echo "</tr>";
    }
    ?>
</table>
