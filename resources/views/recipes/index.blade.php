<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>料理記録アプリ</title>
    @vite(['resources/css/style.css', 'resources/js/toggleDescription.js'])
</head>
<body>
    @if(session('success'))
        <script>alert("{{ session('success') }}");</script>
    @endif
    @if(session('error'))
        <script>alert("{{ session('error') }}");</script>
    @endif

    <h1>料理記録アプリ</h1>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout-btn">ログアウト</button>
    </form>
    <a href="{{ route('recipes.create') }}" class="new-register">新規登録</a>

    <ul>
        @foreach ($recipes as $recipe)
        <li class="recipe">
                <div class="recipe-name">
                    <strong>{{ $recipe->title }}({{ $recipe->type }})</strong><br>
                </div>    

                @if($recipe->image_path)
                    <img src="{{ asset('storage/' . $recipe->image_path) }}" 
                        alt="料理画像" 
                        class="thumbnail" 
                        data-image="{{ asset('storage/' . $recipe->image_path) }}">
                @endif

                <div class="all-btn">
                    <button class="show-description" data-description="{{ $recipe->description }}">
                        説明を見る
                    </button>    

                    <div class="btn">   
                        <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">削除</button>
                        </form>
                        <a href="{{ route('recipes.edit', $recipe->id) }}" class="update">編集</a>
                    </div> 
                </div>        
        </li>
        @endforeach
    </ul>

    <!-- 🔽 説明モーダル -->
    <div id="description-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn desc-close">&times;</span>
            <p id="modal-description"></p>
        </div>
    </div>

    <!-- 🔽 画像モーダル -->
    <div id="image-modal" class="modal">
        <span class="close-btn image-close">&times;</span>
        <img id="modal-image" class="modal-img" alt="拡大画像">
    </div>
</body>
</html>
