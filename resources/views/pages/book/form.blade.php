<div class="mb-3">
    <label for="inputBookTitle" class="form-label">Título</label>
    <input type="text" name="title" class="form-control" id="inputBookTitle"
        value="{{ old('title', $book->title ?? '') }}" aria-describedby="bookTitleHelp" required maxlength="40">
    <div id="bookTitleHelp" class="form-text">No máximo 40 caracteres</div>
</div>
<div class="mb-3">
    <label for="inputBookPublisher" class="form-label">Editora</label>
    <input type="text" name="publisher" class="form-control" id="inputBookPublisher"
        value="{{ old('publisher', $book->publisher ?? '') }}" aria-describedby="bookPublisherHelp" required
        maxlength="40">
    <div id="bookPublisherHelp" class="form-text">No máximo 40 caracteres</div>
</div>
<div class="mb-3">
    <label for="inputBookEdition" class="form-label">Edição</label>
    <input type="number" name="edition" class="form-control" id="inputBookEdition"
        value="{{ old('edition', $book->edition ?? '') }}" aria-describedby="bookEditionHelp" required min="1"
        step="1">
    <div id="bookEditionHelp" class="form-text">Número intero positivo</div>
</div>
<div class="mb-3">
    <label for="inputBookYearPublication" class="form-label">Ano de publicação</label>
    <input type="number" name="year_publication" class="form-control" id="inputBookYearPublication"
        value="{{ old('year_publication', $book->year_publication ?? '') }}" aria-describedby="bookYearPublicationHelp"
        required min="1000" max="{{ date('Y') }}" step="1">
    <div id="bookYearPublicationHelp" class="form-text">Formato de ano válido (YYYY)</div>
</div>
<div class="mb-3">
    <label for="inputBookAmount" class="form-label">Preço</label>
    <input type="text" name="amount" class="form-control" id="inputBookAmount"
        value="{{ old('amount', $book->amount ?? '') }}" aria-describedby="bookAmountHelp" required maxlength="40">
    <div id="bookAmountHelp" class="form-text">Valor em reais (máximo 15 digitos)</div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-5">
        <label for="selectAllAuthor" class="form-label">Autores</label>
        <select id="selectAllAuthor" class="form-select" multiple aria-label="Multiple select example"
            style="min-height: 150px">
            @foreach ($authors as $author)
                <option value="{{ $author->id }}">{{ $author->name }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-2">
        <div class="d-flex flex-column mt-4">
            <button type="button" class="btn btn-secondary mb-3 mx-3"
                onclick="moveOptions('selectAllAuthor', 'selectAllAuthorSelected')">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
            <button type="button" class="btn btn-secondary mb-3 mx-3"
                onclick="moveOptions('selectAllAuthorSelected', 'selectAllAuthor')">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </div>
    </div>
    <div class="col-12 col-md-5">
        <label for="selectAllAuthorSelected" class="form-label">Autores selecioandos</label>
        <select id="selectAllAuthorSelected" name="authors[]" class="form-select" multiple
            aria-label="Multiple select example" style="min-height: 150px" required>
            @isset($book)
                @foreach ($book->authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }} </option>
                @endforeach
            @endisset
        </select>
    </div>
</div>
<div class="row mb-3">
    <div class="col-12 col-md-5">
        <label for="selectAllSubject" class="form-label">Assuntos</label>
        <select id="selectAllSubject" class="form-select" multiple aria-label="Multiple select example"
            style="min-height: 150px">
            @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->description }} </option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-2">
        <div class="d-flex flex-column mt-4">
            <button type="button" class="btn btn-secondary mb-3 mx-3"
                onclick="moveOptions('selectAllSubject', 'selectAllSubjectSelected')">
                <i class="fa-solid fa-arrow-right"></i>
            </button>
            <button type="button" class="btn btn-secondary mb-3 mx-3"
                onclick="moveOptions('selectAllSubjectSelected', 'selectAllSubject')">
                <i class="fa-solid fa-arrow-left"></i>
            </button>
        </div>
    </div>
    <div class="col-12 col-md-5">
        <label for="selectAllSubjectSelected" class="form-label">Assuntos selecioandos</label>
        <select id="selectAllSubjectSelected" name="subjects[]" class="form-select" multiple
            aria-label="Multiple select example" style="min-height: 150px" required>
            @isset($book)
                @foreach ($book->subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->description }} </option>
                @endforeach
            @endisset
        </select>
    </div>
</div>

<script>
    function moveOptions(fromSelectId, toSelectId) {
        const fromSelect = document.getElementById(fromSelectId);
        const toSelect = document.getElementById(toSelectId);
        const selectedOptions = Array.from(fromSelect.selectedOptions);

        selectedOptions.forEach(option => {
            toSelect.appendChild(option);
        });
    }
    document.getElementById("formBook").addEventListener("submit", function() {
        let selectAuthors = document.getElementById("selectAllAuthorSelected");
        let selectSubject = document.getElementById("selectAllSubjectSelected");
        for (let option of selectAuthors.options) {
            option.selected = true;
        }
        for (let option of selectSubject.options) {
            option.selected = true;
        }
    });


    const inputBookYearPublication = document.getElementById('inputBookYearPublication');
    inputBookYearPublication.addEventListener('input', (el) => {
        console.log(el.target.value)
        inputBookYearPublication.value = inputBookYearPublication.value.replace(/\D/g, '');
        if (inputBookYearPublication.value.length > 4) {
            inputBookYearPublication.value = inputBookYearPublication.value.slice(0, 4);
        }
    });
    const inputBookEdition = document.getElementById('inputBookEdition');
    inputBookEdition.addEventListener('input', () => {
        inputBookEdition.value = inputBookEdition.value.replace(/\D/g, '');
    });

    const inputAmount = document.getElementById('inputBookAmount');

    inputAmount.addEventListener('input', function() {
        let value = this.value.replace(/\D/g, '');
        value = value.substring(0, 15);
        value = (parseInt(value, 10) / 100).toFixed(2);
        this.value = value
            .toString()
            .replace('.', ',')
            .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    });

    document.addEventListener('DOMContentLoaded', () => {
        if (inputAmount.value) {
            inputAmount.dispatchEvent(new Event('input'));
        }
    });
</script>
