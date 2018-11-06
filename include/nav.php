<?php


include "koneksi.php";

// $query = "SELECT rowid, * FROM BERITA";

$query = "SELECT a.ID, a.TITLE, a.AUTHOR, a.IMAGE, a.CONTENT1, a.CONTENT2, a.VIEWS, a.IDKAT, b.IDKAT, b.NAMA FROM BERITA a JOIN KATEGORI b ON a.IDKAT=b.IDKAT WHERE a.IDKAT='$_GET[kat]' ORDER BY a.ID DESC";

$result = $db->query($query);

?>

<div class="classynav">
    <ul>
        <li class="active"><a href="index.php">Home</a></li>
        
        
        <li><a href="category.php?kat=1">Technology</a></li>
        <li><a href="category.php?kat=2">Sports</a></li>
        <li><a href="category.php?kat=3">Finance</a></li>
    </ul>
</div>