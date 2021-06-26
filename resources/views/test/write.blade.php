<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('css/test.css')}}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body>

        <header>
            <h1 class="app-title">
                <a href="/">ざつにっき</a>
            </h1>
            <div class="account-menu">
                <a class="about" href="/about">ざつにっきとは</a>
                <a class="login" href="/login">ログイン</a>
                <a class="register" href="/register">はじめる</a>
            </div>
        </header>




        <main>

            <nav class="sidemenu">
                <ul class="sidemenu-body">
                    <li><a class="sidemenu-item current" href="/write">書く</a></li>
                    <li><a class="sidemenu-item" href="/list">ふりかえる</a></li>
                    <li><a class="sidemenu-item" href="/search">さがす</a></li>
                </ul>
            </nav>

            <div class="content">
                <div class="content-body">
                    <div class="editor">
                        <div class="editor-body">
                            <input class="editor-title" type="text" name="" value="2021/12/12" placeholder="日記タイトル(空の場合は日付が入ります)">
                            <textarea class="editor-content" name="name" placeholder="日記を書きましょう！"></textarea>
                            <div class="editor-publish uncheck">
                                <span class="check">公開する</span>
                                <span class="uncheck">公開しない</span>
                            </div>
                            <div class="editor-submit">保存する</div>
                        </div>
                    </div>
                </div>
            </div>

        </main>




        <footer>

        </footer>

    </body>
    <script type="text/javascript">
        //textareaの要素を取得
        let textarea = document.getElementsByClassName('editor-content')[0];
        //textareaのデフォルトの要素の高さを取得
        let clientHeight = textarea.clientHeight;
        //textareaのinputイベント
        textarea.addEventListener('input', ()=>{
            //textareaの要素の高さを設定（rows属性で行を指定するなら「px」ではなく「auto」で良いかも！）
            textarea.style.height = clientHeight + 'px';
            //textareaの入力内容の高さを取得
            let scrollHeight = textarea.scrollHeight;
            //textareaの高さに入力内容の高さを設定
            textarea.style.height = scrollHeight + 'px';
        });

        let publishbox = document.getElementsByClassName('editor-publish')[0];
        publishbox.addEventListener('click', ()=>{
            publishbox.classList.toggle('uncheck');
        });
    </script>
</html>
