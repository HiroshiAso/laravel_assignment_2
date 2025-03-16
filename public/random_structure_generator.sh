#!/bin/sh

# ランダムな文字列を生成する関数
generate_random_string() {
    cat /dev/urandom | tr -dc 'a-zA-Z0-9' | fold -w ${1:-10} | head -n 1
}

# 作成したファイル名とフォルダ名を保存するファイル
NAMES_FILE=$(mktemp)

# 既に作成された名前かどうかをチェックする関数
is_name_used() {
    local name=$1
    if grep -q "^$name$" "$NAMES_FILE" 2>/dev/null; then
        return 0 # 名前は既に使われている
    fi
    return 1 # 名前はまだ使われていない
}

# ユニークな名前を生成する関数
generate_unique_name() {
    local prefix=$1
    local name
    
    while true; do
        name="${prefix}_$(generate_random_string 8)"
        if ! is_name_used "$name"; then
            echo "$name" >> "$NAMES_FILE"
            echo "$name"
            return
        fi
    done
}

# HTMLファイルを生成する関数
generate_html_file() {
    local directory=$1
    local filename=$(generate_unique_name "html")
    local filepath="${directory}/${filename}.html"
    
    # シンプルなHTMLファイルの内容を生成
    cat > "$filepath" << EOF
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>${filename}</title>
</head>
<body>
    <h1>ランダム生成されたページ: ${filename}</h1>
    <p>このHTMLファイルはシェルスクリプトによって自動的に生成されました。</p>
    <p>生成日時: $(date)</p>
</body>
</html>
EOF
    
    echo "HTMLファイル作成: $filepath"
}

# グローバル変数
HTML_COUNT=0
TOTAL_FOLDERS=0
MAX_HTML=100
MAX_FOLDERS=30

# 再帰的にディレクトリとファイルを生成する関数
generate_structure() {
    local current_dir=$1
    local depth=$2
    local max_depth=$3
    
    # 最大フォルダ数に達した場合は処理を終了
    if [ $TOTAL_FOLDERS -ge $MAX_FOLDERS ]; then
        return
    fi
    
    # 現在の深さが最大深さを超えた場合は処理を終了
    if [ $depth -gt $max_depth ]; then
        return
    fi
    
    # 現在のディレクトリにHTMLファイルをランダムに生成
    # RANDOMがない場合は別の方法でランダム数を生成
    local num_files
    if [ -n "$RANDOM" ]; then
        num_files=$((RANDOM % 3 + 1)) # 1〜3個のファイルを生成 (bashの場合)
    else
        num_files=$(($(od -An -N2 -i /dev/urandom) % 3 + 1)) # sh用のランダム数生成
    fi
    
    # HTMLファイルの最大数を超えないようにする
    if [ $((HTML_COUNT + num_files)) -gt $MAX_HTML ]; then
        num_files=$((MAX_HTML - HTML_COUNT))
    fi
    
    local i=0
    while [ $i -lt $num_files ]; do
        # 最大HTMLファイル数に達した場合は処理を終了
        if [ $HTML_COUNT -ge $MAX_HTML ]; then
            return
        fi
        
        generate_html_file "$current_dir"
        HTML_COUNT=$((HTML_COUNT + 1))
        i=$((i + 1))
    done
    
    # 次の階層のサブディレクトリをランダムに生成
    local num_subdirs
    if [ -n "$RANDOM" ]; then
        num_subdirs=$((RANDOM % 3 + 1)) # 1〜3個のサブディレクトリを生成
    else
        num_subdirs=$(($(od -An -N2 -i /dev/urandom) % 3 + 1))
    fi
    
    i=0
    while [ $i -lt $num_subdirs ]; do
        # 最大フォルダ数に達した場合は処理を終了
        if [ $TOTAL_FOLDERS -ge $MAX_FOLDERS ]; then
            return
        fi
        
        local subdir_name=$(generate_unique_name "folder")
        local subdir_path="${current_dir}/${subdir_name}"
        
        mkdir -p "$subdir_path"
        echo "フォルダ作成: $subdir_path"
        
        TOTAL_FOLDERS=$((TOTAL_FOLDERS + 1))
        
        # 再帰的に次の階層の構造を生成
        generate_structure "$subdir_path" $((depth + 1)) $max_depth
        
        i=$((i + 1))
    done
}

# メイン処理
main() {
    # 基準ディレクトリ
    local base_dir="./random_structure"
    local max_depth=5
    
    # コマンドライン引数の処理
    if [ $# -ge 1 ]; then
        base_dir=$1
    fi
    
    # 基準ディレクトリを作成
    mkdir -p "$base_dir"
    echo "基準ディレクトリ作成: $base_dir"
    
    # 構造を生成
    TOTAL_FOLDERS=1
    generate_structure "$base_dir" 1 $max_depth
    
    echo "生成完了！"
    echo "作成されたHTMLファイル: $HTML_COUNT"
    echo "作成されたフォルダ: $TOTAL_FOLDERS"
    
    # 一時ファイルを削除
    rm -f "$NAMES_FILE"
}

# スクリプト実行
main "$@"