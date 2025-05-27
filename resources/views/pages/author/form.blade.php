<div class="mb-3">
    <label for="inputAuthorName" class="form-label">Nome</label>
    <input type="text" name="name" class="form-control" id="inputAuthorName"
        value="{{ old('name', $author->name ?? '') }}" aria-describedby="AuthorNameHelp" required maxlength="40">
    <div id="AuthorNameHelp" class="form-text">No máximo 40 caracteres</div>
</div>
