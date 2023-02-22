<h1>{{$heading}}</h1>

   
@unless (count($listings)==0)

    @foreach ($listings as $listing)
    <a href="/listing/{{$listing['id']}}">{{$listing['title']}}</h3></a>
    
    <p>{{$listing['description']}}</p>
    @endforeach

@else   
<h2>No Listing Found!</h2> 

@endunless
