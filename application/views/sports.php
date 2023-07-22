<!DOCTYPE html>
<html>
<head>
    <title>Athletes</title>
</head>
<body>
    <h1>Search Athletes</h1>
    <form method="post" action="/sports">
            <input type='search' name='search'>
            <label>Male:</label>
            <input type="checkbox" id="easy" name="gender[]" value="male">
            <label>Female:</label>
            <input type="checkbox" id="intermediate" name="gender[]" value="female">
            <label>Sports:</label>
            <label>Basketball</label>
            <input type="checkbox"  name="sport[]" value="Basketball">
            <label>MMA</label>
            <input type="checkbox"  name="sport[]" value="MMA">
            <label>Swimming</label>
            <input type="checkbox"  name="sport[]" value="Swimming">
            <label>Marathon</label>
            <input type="checkbox"  name="sport[]" value="Marathon">
            <input type="submit" value="Search">
    </form>
<?php
    if(isset($athlete)) {
?>
    <div><?=$athlete['athlete_name']?></div>
<?php
    }
    if(isset($athletes)) {
?>
<?php   
    for($index = 0; $index < count($athletes); $index++) {
?>
        <div>
            <?=$athletes[$index]['athlete_name']?>
        </div>
<?php   
    }
?>
    </table>
<?php
    }
?>
</body>
</html>