<h2>All Articles (by all users)</h2>

<p><a href="<?php echo site_url('article/create') ?>">Create New</a></p>

<?php
foreach ($articles as $article) {
    // TODO(mburman): remove logic from view.
    if ($article->deleted) {
        continue;
    }
?>

<p>
<div><a href="<?php echo article_url($article->id); ?>"><?php echo $article->title; ?></a>
<?php if(!$article->public) { echo '(private)';} ?>
</div>
<div>Modified date: <?php echo $article->last_modified; ?><div>
<div>Internal id: <?php echo $article->id; ?></div>
<div>[<a href="<?php echo site_url('article/' . $article->id . '/delete');?>" onclick="return confirm('Are you sure you want to delete this article?');">delete</a>]</div>
</p>

<?php
}


?>
