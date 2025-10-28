<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿画面</title>
    @vite(['resources/css/create.css'])
</head>
<body>
    <h1>投稿画面</h1>
    <div class="form">
        <div class="form-contents">
            <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text" name="title" placeholder="タイトル" class="input-title"><br>
                <input type="file" name="image_path" class="input-file"><br>
                <textarea name="description" id="description" placeholder="説明"></textarea><br>
                <select name="type" id="type" class="select-type">
                    <option value="メイン">メイン</option>
                    <option value="サブ">サブ</option>
                </select><br>
                <input type="submit" value="登録" class="submit-btn">
            </form>
        </div>    
    </div>    
    <a href="{{ route('recipes.index') }}">戻る</a>
</body>
</html>