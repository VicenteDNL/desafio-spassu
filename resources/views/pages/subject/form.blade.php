<div class="mb-3">
    <label for="inputSubjectDescription" class="form-label">Descrição</label>
    <input type="text" name="description" class="form-control" id="inputSubjectDescription"
        value="{{ old('description', $subject->description ?? '') }}" aria-describedby="SubjectDescriptionHelp" required
        maxlength="20">
    <div id="SubjectDescriptionHelp" class="form-text">No máximo 20 caracteres</div>
</div>
