<h2>Upload file</h2>


<form action="/upload" enctype="multipart/form-data" method="POST">
    <input type="file" name="receipt" />
    <button type="submit">SUBMIT</button>
</form>

<h2> Invoices </h2>

<div>

    <?php if(! empty($invoice)) : ?>
        Invoice ID <?= htmlspecialchars($invoice['id'], ENT_QUOTES) ?> <br />
        Invoice Amount <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?> <br />
        User <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?> <br />
    <?php endif ?>
</div>