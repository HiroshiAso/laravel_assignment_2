<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VSCodeショートカット実践チェック</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #ff6600;
            padding-bottom: 10px;
        }
        h2 {
            color: #ff6600;
            margin-top: 30px;
            border-left: 5px solid #ff6600;
            padding-left: 10px;
        }
        .task {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .task-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .shortcut {
            background-color: #e6f7ff;
            padding: 3px 7px;
            border-radius: 3px;
            font-family: monospace;
            font-weight: bold;
        }
        pre {
            background-color: #f0f0f0;
            padding: 10px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .timer {
            text-align: center;
            font-size: 24px;
            margin: 20px 0;
            color: #ff6600;
        }
        .hint {
            color: #666;
            font-style: italic;
            margin-top: 5px;
        }
        .comment {
            color: green;
        }
    </style>
</head>
<body>
    <h1>VSCodeショートカット実践チェック</h1>

    <div class="timer">制限時間: 15分</div>

    <p>以下の課題を<span class="shortcut">マウスを使わずに</span>ショートカットキーのみで完成させてください。
       各課題が終わったら、次の課題に進んでください。</p>

    <h2>基本操作</h2>

    <div class="task">
        <div class="task-title">課題1: ファイル保存とナビゲーション</div>
        <p>1. このファイルを<span class="shortcut">Ctrl+S</span>で保存してください。</p>
        <p>2. 新しいファイル<span class="shortcut">Ctrl+N</span>を作成し、下記のコードを入力してください：</p>
        <pre>console.log("新しいファイルを作成しました！");</pre>
        <p>3. 再びこのファイルに<span class="shortcut">Ctrl+Tab</span>で戻ってきてください。</p>
        <div class="hint">確認: 新しいファイルを作成して元のファイルに戻れましたか？</div>
    </div>

    <div class="task">
        <div class="task-title">課題2: コピー・貼り付け・元に戻す</div>
        <p>以下のコードブロックがあります：</p>
        <pre>// この行をコピーして3回複製してください
function sayHello() {
    console.log("Hello, VS Code!");
}
// ここに貼り付けてください</pre>
        <p>1. 「この行をコピーして3回複製してください」の行を<span class="shortcut">Ctrl+C</span>でコピーします。</p>
        <p>2. 「ここに貼り付けてください」の行に3回<span class="shortcut">Ctrl+V</span>で貼り付けます。</p>
        <p>3. 一度<span class="shortcut">Ctrl+Z</span>で元に戻し、再度<span class="shortcut">Ctrl+Y</span>でやり直してください。</p>
        <div class="hint">確認: 3行のコピーが貼り付けられていますか？</div>
    </div>

    <h2>編集の力</h2>

    <div class="task">
        <div class="task-title">課題3: 行の移動とコピー</div>
        <p>以下のコードの順番を入れ替えてください：</p>
        <pre>console.log("3番目の行");
console.log("1番目の行");
console.log("2番目の行");
console.log("4番目の行");</pre>
        <p>1. 2行目を<span class="shortcut">Alt+↑</span>で1行目に移動させます。</p>
        <p>2. 3行目を<span class="shortcut">Alt+↓</span>で4行目の後ろに移動させます。</p>
        <p>3. 1行目を<span class="shortcut">Shift+Alt+↓</span>でコピーして、最後の行の後に複製します。</p>
        <div class="hint">確認: 適切な順序になり、1行目が最後にも複製されていますか？</div>
    </div>

    <div class="task">
        <div class="task-title">課題4: コメントアウトとマルチカーソル</div>
        <p>以下のコードに対して操作を行います：</p>
        <pre>const fruits = ["apple", "banana", "cherry", "date"];
fruits.forEach(fruit => {
    // ここの4行をコメントアウトする
    console.log(fruit);
    const uppercased = fruit.toUpperCase();
    console.log(uppercased);
    document.write(fruit + "&lt;br&gt;");
});</pre>
        <p>1. 「ここの4行をコメントアウトする」の下の4行を選択し、<span class="shortcut">Ctrl+/</span>でコメントアウトします。</p>
        <p>2. <span class="shortcut">Alt+クリック</span>を使って「fruit」という単語の各出現箇所にカーソルを置きます。</p>
        <p>3. <span class="shortcut">Ctrl+D</span>を使って「fruit」という単語のすべての出現を選択し、「item」に置き換えます。</p>
        <div class="hint">確認: 4行がコメントアウトされ、すべての「fruit」が「item」に変更されていますか？</div>
    </div>

    <div class="task">
        <div class="task-title">課題5: 矩形選択</div>
        <p>以下の文字列の先頭に「*」を追加します：</p>
        <pre>項目1
項目2
項目3
項目4
項目5</pre>
        <p><span class="shortcut">Shift+Alt+ドラッグ</span>を使って各行の先頭を矩形選択し、一度に「* 」を追加してください。</p>
        <div class="hint">確認: すべての行の先頭に「* 」が追加されていますか？</div>
    </div>

    <h2>検索と置換</h2>

    <div class="task">
        <div class="task-title">課題6: 検索と行移動</div>
        <p>この文書内で<span class="shortcut">Ctrl+F</span>を使って「確認」という単語を検索してください。</p>
        <p><span class="shortcut">Ctrl+G</span>を使って50行目に移動してください。</p>
        <div class="hint">確認: 「確認」が見つかり、50行目に移動できましたか？</div>
    </div>

    <div class="task">
        <div class="task-title">課題7: 置換</div>
        <p>以下のテキストを修正します：</p>
        <pre>const old_variable = 123;
const another_old_variable = 456;
function old_function() {
    return old_variable + another_old_variable;
}</pre>
        <p><span class="shortcut">Ctrl+H</span>を使って、すべての「old」を「new」に置換してください。</p>
        <p>次に<span class="shortcut">Ctrl+Shift+F</span>を使って、プロジェクト内の「const」を検索してみてください。</p>
        <div class="hint">確認: すべての「old」が「new」に変更されていますか？</div>
    </div>

    <div class="task">
        <div class="task-title">課題8: ファイル内の移動</div>
        <p><span class="shortcut">Ctrl+P</span>を使ってこのプロジェクト内のファイルを検索し、先ほど作成した新しいファイルを開いてください。</p>
        <div class="hint">確認: 先ほど作成したファイルを開くことができましたか？</div>
    </div>

    <h2>総合課題</h2>

    <div class="task">
        <div class="task-title">課題9: 総合演習</div>
        <p>以下のコードを修正してください：</p>
        <pre>// 以下のコードを修正してください
function oldCalculate(x, y) {
    // 以下の行を削除
    console.log("This is old code");
    // この行を上に移動
    const result = x * y;

    return result;
}

// このコードを3回複製してください
const testValue = oldCalculate(10, 20);

// 複製した各関数の名前を一括置換してください
// oldCalculate → newCalculate</pre>
        <p>1. コメントにあるように、指定された行を削除・移動します。</p>
        <p>2. 「このコードを3回複製してください」の行の下のコードを3回複製します。</p>
        <p>3. すべての「oldCalculate」を「newCalculate」に一括置換します。</p>
        <div class="hint">確認: コードが正しく修正され、関数名が一括置換されていますか？</div>
    </div>

    <h2>完了！</h2>
    <p>すべての課題を完了しましたか？マウスを使わずにショートカットキーだけでどこまで操作できたか振り返ってみましょう。</p>
    <p>できなかったショートカットがあれば、覚えて日常的に使ってみましょう。</p>
</body>
</html>
