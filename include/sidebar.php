<?php


include "koneksi.php";

// $query = "SELECT rowid, * FROM BERITA";

$query = "SELECT a.ID, a.TITLE, a.AUTHOR, a.IMAGE, a.CONTENT1, a.CONTENT2, a.VIEWS, a.IDKAT, b.IDKAT, b.NAMA FROM BERITA a JOIN KATEGORI b ON a.IDKAT=b.IDKAT ";

$result = $db->query($query);

?>

<?php while($row = $result->fetchArray()) {?>
    <!-- Single Featured Post -->
    <div class="single-blog-post small-featured-post d-flex">
        <div class="post-thumb">
            <a href="#"><img src="img/bg-img/19.jpg" alt=""></a>
        </div>
        <div class="post-data">
            <input type="hidden" name="field_name" value="<?php echo $row['ID'];?>"/>
            <a href="#" class="post-catagory"><?php echo $row['NAMA'];?></a>
            <div class="post-meta">
                <a href="#" class="post-title">
                    <h6><?php echo $row['TITLE'];?></h6>
                </a>
                <!-- <p class="post-date"><span>7:00 AM</span> | <span>April 14</span></p> -->
            </div>
        </div>
    </div>
<?php } ?>

