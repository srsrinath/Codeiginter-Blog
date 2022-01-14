<?= $this->extend('layouts/email_layout') ?>

<?= $this->Section('content') ?>

<tr>
    <td align="left" style="padding: 0 0 5px 25px; font-size: 18px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #aaaaaa;" class="padding-meta">Dear <?= 'Admin' ?></td>
</tr>
<!-- <tr>
                                    <td align="left" style="padding: 0 0 5px 25px; font-size: 22px; font-family: Helvetica, Arial, sans-serif; font-weight: normal; color: #333333;" class="padding-copy">A fantastic library of information</td>
                                </tr> -->
<tr>

    <td align="left" style="padding: 10px 0 15px 25px; font-size: 16px; line-height: 24px; font-family: Helvetica, Arial, sans-serif; color: #666666;" class="padding-copy">New contact form Submission:
        <br>
        Name: <?= $data['name'] ?> <br>
        Phone Number:<?= $data['phone']?><br>
        Email: <?= $data['email'] ?> <br>
        Message: <?= $data['message'] ?> <br>
    </td>
</tr>

<?= $this->endSection() ?>