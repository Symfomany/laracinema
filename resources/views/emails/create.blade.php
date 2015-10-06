<h1>Un administrateur a été crée: {{ $user->email }}  </h1>
<h3>Détail: </h3>
<ul>
   <li>Nom: {{ $user->firstname }} {{ $user->lastname }}</li>
   <li>Extras: {{ $user->description }} {{ $user->photo }}</li>
   <li>Date: {{ $user->created_at }} </li>
</ul>