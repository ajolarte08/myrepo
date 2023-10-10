<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Result</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Results</h1>
    <table>
        <thead>
            <tr>
                <th>Words</th>
                <th>Frequency</th>
            </tr>
        </thead>
        <tbody>
    <?php

    //Word Frequency Calculation function
    function word_counter($words, $stop_words) {
        //convert to lowercase
        $words = array_map("strtolower",$words);
        //count words
        $count_word = array_count_values($words);
        //remove common stop words
        foreach ($stop_words as $stop_words) {
            $stop_words = strtolower($stop_words);
            unset($count_word[$stop_words]);
        }
        return $count_word;
    }

    // Sorting Option function
    function sorting_words($word_counted, $sort) {
        if ($sort == "asc") {
            asort($word_counted);
        } else {
            arsort($word_counted);
        }
        return $word_counted;
    }

    // Display Limit function
    function limiting_words($wordFrequency, $limit) {
        return array_slice($wordFrequency, 0, $limit);
    }

    // Initializaing common stop words
    const stop_words = ["the","and","in"];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // User Input
        $input = $_POST["text"];
        $sortby = $_POST["sort"];
        $limit = $_POST["limit"];

            // Tokenization
            $token = str_word_count($input, 1);

            // Calling word frequency calculator
            $word_counted = word_counter($token, stop_words);
            // Calling sort option
            $sorted_word = sorting_words($word_counted, $sortby);

            // Calling display limit function
            $limited_word = limiting_words($sorted_word, $limit);
            
            // Output
            foreach ($limited_word as $token => $counted) {
                echo "<tr><td>$token</td><td>$counted</td></tr>";
            }
    }
    
    ?>
        </tbody>
    </table>
</body>
</html>
