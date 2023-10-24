<?php
$st = $_GET['start'] ?? null;
$fn = $_GET['finish'] ?? null;

if ($st === null || $fn === null) {
    $st = 0;
    $fn = 0;
} else {
    $st = (int) $st;
    $fn = (int) $fn;

    if ($st <= $fn) {
        $str = '';
        $newline = '';
        for ($i = $st; $i <= $fn; $i++) {
            $num = '';
            if (strlen($i) < 10) {
                for ($j = 0; $j < 10 - ((strlen($i))); $j++) {
                    //echo '0';
                    $num .= '0';
                }
            }
            $num .= $i;
            $str .= $newline . $num;
            $newline = chr(10);
        }
        $file = $st . '_' . $fn . '.txt';

        // Set headers for file download
        header("Content-Disposition: attachment; filename=\"$file\"");
        header('Content-Type: text/plain');
        header('Content-Length: ' . strlen($str));
        header('Connection: close');

        // Output the file content
        echo $str;
    }
}
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Generate Number 0000000000-9999999999</title>
    <meta name="author" content="Kanapot">
</head>
<style type="text/css">
    ::selection {
        background-color: #E13300;
        color: white;
    }

    ::-moz-selection {
        background-color: #E13300;
        color: white;
    }

    body {
        background-color: #fff;
        margin: 40px;
        font: 13px/20px normal Helvetica, Arial, sans-serif;
        color: #4F5155;
    }

    a {
        color: #003399;
        background-color: transparent;
        font-weight: normal;
    }

    h1 {
        color: #444;
        background-color: transparent;
        border-bottom: 1px solid #D0D0D0;
        font-size: 19px;
        font-weight: normal;
        margin: 0 0 14px 0;
        padding: 14px 15px 10px 15px;
    }

    code {
        font-family: Consolas, Monaco, Courier New, Courier, monospace;
        font-size: 12px;
        background-color: #f9f9f9;
        border: 1px solid #D0D0D0;
        color: #002166;
        display: block;
        margin: 14px 0 14px 0;
        padding: 12px 10px 12px 10px;
    }

    #container {
        margin: 10px;
        border: 1px solid #D0D0D0;
        box-shadow: 0 0 8px #D0D0D0;
    }

    p {
        margin: 12px 15px 12px 15px;
    }
</style>
</head>
<body>
    <div id="container">
        <h1>สร้างไฟล์ .txt</h1>
        <p>โดยระบุเลขในช่อง start และ finish หรือ กดปุ่มตัวเลขเพื่อกำหนดค่าตั้งแต่ 0 - 9999999999</p>
        <p>กดปุ่ม Start เพื่อเริ่มต้น</p>
        <form action="index.php" method="get">
            <label for="start">Start:</label><input type="text" name="start" id="start" value="<?php echo $st; ?>"><br>
            <label for="finish">Finish:</label><input type="text" name="finish" id="finish"
                value="<?php echo $fn; ?>"><br>
            <button type="submit">Start</button>
            <hr>

            <?php
            $start = 0;
            $step = 4999999;
            $end = 9999999999;
            $count = 0;
            $last = 0;
            for ($loop = $start; $loop <= $end; $loop += $step) {
                if ($loop + $count > $end) {
                    $last = $end;
                } else {
                    $last = $loop + $count;
                }
                if ($count != 0) {
                    if ($last - $step == 1) {
                        echo "<button type='button' onclick='setValues(0, $last)'>$count</button> ";
                    } else {
                        echo "<button type='button' onclick='setValues($last - $step, $last)'>$count</button> ";
                    }
                }
                $count++;
            }
            echo 'Total : ' . $count;
            ?>

        </form>
    </div>
    <script>
        function setValues(start, finish) {
            document.getElementById("start").value = start;
            document.getElementById("finish").value = finish;
        }
    </script>
</body>

</html>