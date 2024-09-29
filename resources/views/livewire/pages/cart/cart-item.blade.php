<div>
    <h1>This is the cart items</h1>
    {{$title}}
    <form>
    
        <label for="title">Title:</label>
        <br>
        <input type="text" id="title" wire:model.live="title">
        <button type="submit">submit</button>
    </form>


    <br>

    @foreach ($cart_items as $cart)
        <div wire:key="{{ $cart->id }}"> 
            @if ($user_id == $cart->user_id)
                {{$cart->product_id}}
                {{$cart->user_id}}
                {{$cart->cart_quantity}} 
                    
            @endif
        </div>
    @endforeach


    <br>
   
</div>
