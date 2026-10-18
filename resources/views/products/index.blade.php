<html>
    <head></head>
    <body>

        <!-- In Traditional PHP we use the 'php block tags with arrow and less than marks' to swithch to PHP why don't we here  -->
        @foreach ($products as $product)
        <div>
            <div style="border: solid, grey; margin: 10px; padding: 10px;">
            <img 
                src="{{ $product->product_image }}" 
                alt="product image"
                style="width: 300; height= 300" 

            >
            <h2>{{$product->description}}</h2>
            <h5>${{$product->price}}</h5>
            <button type="button" style=": ;">Add to cart</button>
            
            </div>
        </div>
        
        
        @endforeach
    </body>
</html>