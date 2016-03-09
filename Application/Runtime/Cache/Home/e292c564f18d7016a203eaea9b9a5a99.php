<?php if (!defined('THINK_PATH')) exit(); $lang = L('messagearr'); dumps($lang); ?>
<style type="text/css">
body{padding:0px;margin:0px;line-height:1.6;color:#222;font-size:14px;
font-family:"Helvetica Neue","Hiragino Sans GB","Microsoft YaHei","\9ED1\4F53",Arial,sans-serif !important;}
table{border-spacing:0;border-collapse:collapse}
td,th{padding:0}
.message{width:650px;margin:20px auto;margin-top:20px;color:#666666;position:relative;}
.message_tip{height:50px;line-height:25px;font-size:14px;color:#ff3636;}
.message table{border:0}
.message table td{border:0;height:40px;line-height:40px;}
.message table td input{border:1px solid #ccc;height:25px;vertical-align:middle;}
.message table td textarea{border:1px solid #ccc;width:496px;height:150px;}
.message_contact{display:block;font-size:14px;width:600px;height:40px;line-height:40px;border-top:1px solid #ccc;border-bottom:1px solid #ccc;margin-top:30px;margin-bottom:10px;text-indent:20px;color:#ff3636;}
.message_btn{width:50px;height:30px;background:#ffffff;cursor:pointer}
#showMsg{display:none;position:absolute;color:#fff;font-weight:bold;border:1px solid #eee;
background:rgba(0,0,0,.5);padding:35px 20px;width:200px;text-align:center;}
</style>
<script type="text/javascript">
$(function(){
    var message = $("#message"),
        showMsg = $('#showMsg'),
        top     = (message.height()-showMsg.outerHeight())/2,
        left    = (message.width()-showMsg.outerWidth())/2;
        
    $("#showMsg").css({top:top,left:left});
    message.submit(function() {
        var t = $(this);
        $.post(t.attr("action"), t.serializeArray(), function(data){
            $("#showMsg").html('');
            if (data.status==1) {
                t.find(":input").not(":button, :submit, :reset, :hidden").val("");
                t.find("textarea").not(":hidden").val("");
            } else {
                
            }
            $("#showMsg").fadeIn(1000).html(data.message).fadeOut(3000);
        },'json');
        return false;
    });
});
</script>
<div class="message">
    <form id="message" action="<?php echo U("GuestBook/message");?>" method="post">
        <div class="message_tip"><?php echo ($lang["tip"]); ?></div>
        <table>
            <tr>
                <td width="100"><?php echo ($lang["title"]); ?></td>
                <td width="500"><input type="text" name="title" style="width:500px;" /></td>
            </tr>
            <tr>
                <td><?php echo ($lang["content"]); ?></td>
                <td><textarea name="content" class="textarea"></textarea></td>
            </tr>
        </table>
        <span class="message_contact"><?php echo ($lang["contact"]); ?></span>
        <table>
            <tr>
                <td width="100"><?php echo ($lang["sex"]); ?></td>
                <td width="500"><input type="radio" name="sex" value="1" checked/><?php echo ($lang["sex1"]); ?> <input type="radio" name="sex" value="0"/><?php echo ($lang["sex0"]); ?></td>
            </tr>
            <tr>
                <td><?php echo ($lang["name"]); ?></td>
                <td><input type="text" name="name" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["address"]); ?></td>
                <td><input type="text" name="address" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["tel"]); ?></td>
                <td><input type="text" name="tel" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["mobile"]); ?></td>
                <td><input type="text" name="mobile" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["fax"]); ?></td>
                <td><input type="text" name="fax" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["company"]); ?></td>
                <td><input type="text" name="company" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["email"]); ?></td>
                <td><input type="text" name="email" style="width:95%;"/></td>
            </tr>
            <tr>
                <td><?php echo ($lang["home"]); ?></td>
                <td><input type="text" name="home" style="width:95%;"/></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="hidden" name="step" value="2" />
                    <input type="hidden" name="lang" value="<?php echo LANG_SET;?>" />
                    <input type="submit" value="<?php echo ($lang["go"]); ?>" class="message_btn"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" value="<?php echo ($lang["reset"]); ?>" class="message_btn"/>
                </td>
            </tr>
        </table>
        <div id="showMsg"></div>
    </form>   
</div>