<!DOCTYPE html>
<html>
<head>
    <title>Hangman</title>
</head>
<body>
    <h1>Simple 'Hangman' Game</h1>
    <h2>Guess The Band</h2>
    <form name="hangmanForm" method="GET" action="hangman.php">
        
        <?php
        global $word;
        $word=getWord();
        echo "<input id='word' name='word' type='hidden' value='".$word."' />";
        totalPlaces($word);
        ?>
        <?php echo "<br/>"; ?>
        <?php echo "<br/>"; ?>
        <span id="guessedLetter"><input type="text" maxlength="1" minlength="1" name="letter" id="letter" placeholder="Guess a letter" /></span>
        <input id="guess" name="guess" type="button" onclick=letterCheck() value="Guess" />
        <button id="restart" name="restart" type="button" onclick=location.reload()>Restart</button>
    </form>
    <ul id="letters"></ul>
    <p id="man"></p>
    <p id="output" class="output"></p>
</body>
<script src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
var count=7;
function letterCheck()
{
    var input=document.getElementById("letter").value;
    //alert(input);
    var word=document.getElementById("word").value;
    //alert(word);
    $.ajax({
        url:"checkLetter.php", //the page containing php script
        type: "GET", //request type
        data: {'input':input,'word':word},
        success:function(result)
        {
            if(count>0)
            {
                if(result=="wrong letter"){
                    count--;
                    alert("Incorrect Guess!!! \n So you now have "+(count+1)+" guesses left.");

                }
                else
                {
                    //alert(input+" "+result);
                    res=result.split("");
                    for(i=0;i<res.length;i++)
                    {
                        //alert(res[i]);
                        document.getElementById(''+res[i]).value=input;
                    }    
                }
            }
            else
            {
                alert("Game Over");
                alert("New Game About to Start");
                location.reload();
            }
        }
    });     
}
</script>
</html>
<?php
function getWord()
{
	$file="BandsList.txt";
	$fopen = fopen($file, "r");
	$fread = fread($fopen,filesize($file));
	$split = explode("\n", $fread);
    $array[] = null;
    foreach ($split as $string)
    {
        array_push($array,$string);
    }
    $word_index = array_rand($array,1);
    $word = $array[$word_index];
    return $word;
}

function totalPlaces($word)
{
    for($i=1;$i<=strlen($word);$i++)
    {
           echo "<input type='text' id='".$i."' readonly></input>";
    }
}
?>