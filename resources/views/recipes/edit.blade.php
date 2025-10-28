<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
    @vite(['resources/css/edit.css'])
</head>
<body>
    <h1>レシピ編集</h1>
    <div class="form">
        <div class="form-contents">
            <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="text" name="title" value="{{ $recipe->title }}" class="input-title"><br>
                <textarea name="description">{{ $recipe->description }}</textarea><br>

                <select name="type" class="select-type">
                    <option value="メイン" {{ $recipe->type === 'メイン' ? 'selected' : '' }}>メイン</option>
                    <option value="サブ" {{ $recipe->type === 'サブ' ? 'selected' : '' }}>サブ</option>
                </select><br>

                @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" class="img"><br>
                @endif

                <input type="file" name="image_path" class="file"><br>

                <button type="submit" class="submit-btn">更新する</button>
            </form>
        </div>
    </div>    
    <a href="{{ route('recipes.index') }}">戻る</a>
</body>
</html>