<div class="mes">
     <br/> <br/>
        <?php
        $i = 0;
/*
        var_dump($votes);*/
        foreach ($quizes as $quiz) {
            echo "<ul class='mess'>";
            echo "<li>";
            echo "<div class='question'>" . "<b>Topic:</b> " . $quiz[$i]['topic'] . "</div></li>" . "<br/>";
            echo "<div class='answer'><b>Variants:</b> ";
            echo "</br>";
            echo "</br>";
            if (!empty($quiz[$i]['answer_1'])) {
                echo "<span class='top'>".$quiz[$i]['answer_1']."</span>";
                echo "</br>";
                echo "<a href='/web/4/god/profile/vote/?vote=1&topic=" . $quiz[$i]['topic'] . "'>";
                if (!$voted[$quiz[$i]['id']])
                    echo "Vote<br />";
                echo "</a><b>Number of votes:</b> " . $votes[$quiz[$i]['id']]['votes_1']['number'];
                echo "</br>";
                echo "<br/>";echo "<hr/>";
            }
            if (!empty($quiz[$i]['answer_2'])) {
                echo "<span class='top'>".$quiz[$i]['answer_2']."</span>";
                echo "</br>";
                echo "<a href='/web/4/god/profile/vote/?vote=2&topic=" . $quiz[$i]['topic'] . "'>";
                if (!$voted[$quiz[$i]['id']])
                    echo "Vote<br />";
                echo "</a><b>Number of votes: </b>" . $votes[$quiz[$i]['id']]['votes_2']['number'];

                echo "<br/>";echo "<br/>";echo "<hr/>";
            }
            if (!empty($quiz[$i]['answer_3'])) {
                echo "<span class='top'>".$quiz[$i]['answer_3']."</span>";
                echo "</br>";
                echo "<a href='/web/4/god/profile/vote/?vote=3&topic=" . $quiz[$i]['topic'] . "'>";
                if (!$voted[$quiz[$i]['id']])
                    echo "Vote<br />";
                echo "</a><b>Number of votes:</b> " . $votes[$quiz[$i]['id']]['votes_3']['number'];
                echo "</br>";
                echo "<br/>";echo "<hr/>";
            }
            if (!empty($quiz[$i]['answer_4'])) {
                echo "<span class='top'>".$quiz[$i]['answer_4']."</span>";
                echo "</br>";
                echo "<a href='/web/4/god/profile/vote/?vote=4&topic=" . $quiz[$i]['topic'] . "'>";
                if (!$voted[$quiz[$i]['id']])
                    echo "Vote<br />";
                echo "</a><b>Number of votes:</b> " . $votes[$quiz[$i]['id']]['votes_4']['number'];
                echo "</br>";
                echo "<br/>";echo "<hr/>";
            }
            echo "</li>";
            echo "<br/>";
            echo "</ul>";

        }
        $i++;
        ?>
</div>
<style>
    .top {
        color: #483D8B;
    }
    .question {
        border: 2px solid rgba(255, 0, 0, 0.5);
        background-color: rgba(255, 0, 0, 0.1);
    }

    .answer {
        border: 2px solid rgba(0, 169, 0, 0.5);
        background-color: rgba(0, 169, 0, 0.1);
    }

    .question, .answer {
        width: 300%;
        padding: 10 10 10 10px;
        margin-left: 12%;
        border-radius: 6%;
    }

    li {
        display: inline;
    }

    .mes {
        font-size: 20px;
        margin-top: -5%;
        margin-left: 4%;
        position: absolute;
    }

    .nav {
        display: inline;
        width: 100px;
        height: 10px;
    }


</style>


