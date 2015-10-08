<h4>Un administrateur a été crée une tache: {{ $data['task'] }}</h4>
<p>Criticité: <b>{{ $data['criticity'] }}</b> </p>
<p>Email: {{ $user->email }}</p>
<ul>
   <li>Nom: {{ $user->firstname }} {{ $user->lastname }}</li>
   <li>Extras: {{ $user->description }} {{ $user->photo }}</li>
   <li>Date: {{ $user->created_at }} </li>
</ul>