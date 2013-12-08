<ul> 
<!--display user's initial search term--> 
    <li><a class="link" href="#" title="<?php echo $data['keyword']; ?>"><?php echo $data['keyword']; ?></a></li> 
<!---->      

    <?php if ($data['words']) foreach($data["words"] as $word) { ?> 
    <li><a class="link" href="/word/<?php echo $word->id; ?>" target="_blank" title="<?php echo $word->kanji; ?>"><?php echo "{$word->kanji}"; ?></a></li> 
    <?php } ?> 
</ul> 