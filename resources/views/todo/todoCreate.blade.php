<div id="createTodo" class="col-md-6">

    <form method="POST" action="/todo/create">
        {{csrf_field()}}
        
        <div class="form-group">
            <label for="importance">Typ zadania:</label><br>
            <select name="importance" class="form-control">
                <option value="1">Normalne</option>
                <option value="2">Ważne</option>
                <option value="3">Bardzo ważne</option>
            </select>
        </div>

        <div class="form-group">
            <label for="body">Treść zadania:</label>
            <textarea id="body" name="body" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="endtask">Do kiedy musisz wykonać zadanie:</label><br>
            <input type="date" name="endTask" style="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Dodaj zadanie</button>
        </div>

    </form>

</div>
<div id="createToggle" class="col-sm-6 center" >
        Dodaj zadanie
</div>

@include('layouts.errors')
