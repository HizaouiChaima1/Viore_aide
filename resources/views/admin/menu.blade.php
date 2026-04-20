<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Menu</title>
</head>
<body>
    <style>
.sidebar {
    width: 250px;
    background: linear-gradient(to bottom, #f5f5f5, #e5e5e5);
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    height: 100vh;
    position: sticky;
    top: 0;
    display: flex;
    flex-direction: column;
    border: 1px solid #000;
}

.sidebar-title {
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 30px;
    color: #333;
    text-align: center;
}

.sidebar-categories {
    list-style-type: none;
    padding: 0;
    margin: 0;
    display: flex;
    flex-direction: column;
    margin-top: 0;
    gap: 15px;
}

.sidebar-link {
    padding: 15px;
    color: #333;
    text-decoration: none;
    border-radius: 3px;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.sidebar-link:hover {
    background-color: #ddd;
}

.sidebar-icon {
    width: 24px;
    height: 24px;
    margin-right: 15px;
}

.sidebar-text {
    flex: 1;
    font-size: 18px;
}
    </style>
    <aside>
        <div class="sidebar">
            <h2 class="sidebar-title">Menu</h2>
            <ul class="sidebar-categories">
                @foreach ($Categoriep as $cat)
                <li>
                    <a href="{{ url('/menu/' . $cat->id) }}" class="sidebar-link">
                        <img src="{{ $cat->photo }}" class="img img-responsive sidebar-icon">
                        <span class="sidebar-text">{{ $cat->Nom }}</span>
                    </a>
                </li>
            @endforeach
            
            
            </ul>
            
        </div>
        
    </aside> 
    <!-- Dans le corps de votre page HTML -->


 
</body>
</html>