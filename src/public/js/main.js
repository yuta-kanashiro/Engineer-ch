// ユーザー詳細画面
$(function(){
    $('.btn-bulletin').click(function() {
        // 表示する
        $('.bulletin').show();
        // 非表示にする
        $('.like').hide();
    });

    $('.btn-like').click(function() {
        // 表示にする
        $('.like').show();
        // 非表示にする
        $('.bulletin').hide();
    });
});

// 掲示板コメント画面
$('#comment').change(function () {
    //入力欄が空かどうかフラグ
    let flag = true;
    //もし入力欄が空なら
    if ($('#comment').val() === "") {
        flag = false;
    }
    //入力されていたら
    if (flag) {
        //送信ボタンを復活
        $('#send-btn').prop('disabled', false);
    }
    else {
        //送信ボタンを閉じる
        $('#send-btn').prop('disabled', true);
    }
});

// フォロー一覧画面
$(function(){
    // 非表示にする
    $('.follower').hide();
    // ボタンのデザイン
    $('.btn-following').addClass('orange-color');
    $('.btn-follower').addClass('btn-outline-warning');

    $('.btn-following').click(function() {
        // 表示する
        $('.following').show();
        // 非表示にする
        $('.follower').hide();
        // ボタンのデザイン
        $('.btn-following').removeClass('btn-outline-warning');
        $('.btn-following').addClass('orange-color');
        $('.btn-follower').removeClass('orange-color');
        $('.btn-follower').addClass('btn-outline-warning');
    });

    $('.btn-follower').click(function() {
        // 表示にする
        $('.follower').show();
        // 非表示にする
        $('.following').hide();
        // ボタンのデザイン
        $('.btn-following').removeClass('orange-color');
        $('.btn-following').addClass('btn-outline-warning');
        $('.btn-follower').removeClass('btn-outline-warning');
        $('.btn-follower').addClass('orange-color');
    });
});

// 掲示板投稿のチェックボタン
$(function () {
    $('input[id="limited_key"]').change(function () {
        // チェックされたら、解除されたら
        if($('input[id="limited_key"]').prop('checked')){
            $('.full-release').hide();
            $('.limited-release').show();
        } else if ($('input[id="limited_key"]').prop('checked', false)) {
            $('.limited-release').hide();
            $('.full-release').show();
        }
    });
});