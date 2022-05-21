// trix editor
document.addEventListener('trix-file-accept', function (e) {
  e.preventDefault()
})

// image preview
function previewImage() {
  const image = document.querySelector('#image')
  const imgPreview = document.querySelector('.img-preview')

  imgPreview.style.display = 'block'

  const oFReader = new FileReader()
  oFReader.readAsDataURL(image.files[0])

  oFReader.onload = function (oFREvent) {
    imgPreview.src = oFREvent.target.result
  }
}

//fungsi make Slug
function makeslug(name, slug, link){
  name.addEventListener("change", function () {
  fetch(link+name.value)
      .then((response) => response.json())
      .then((data) => (slug.value = data.slug));
});
}

// Fungsi Make Brand
function makeBrand(brand,models,link){ 
  brand.addEventListener('change', function () {
      
    fetch(link + brand.value)
      .then((response) => response.json())
      .then((response) => {
        const m = response
        let card = '<option>---Choice Model---</option>'
        m.forEach(
          (m) => (card += '<option value="' + m.id + '">' + m.name + '</option>'),
        )
        models.innerHTML = card
      })
  })
}

function addCategoryPart(categorypart,part,link){
  categoripart.addEventListener("change", function () {
      fetch(link + categoripart.value)
          .then((response) => response.json())
          .then((response) => {
              const m = response;
              let card = "<option>--Select Sparepart---</option>";
              m.forEach(
                  (m) =>
                      (card +=
                          '<option value="' +
                          m.id +
                          '">' +
                          m.name +
                          " - " +
                          m.models.brand.name +
                          "   " +
                          m.models.name +
                          "</option>")
              );
              sparepart.innerHTML = card;
          });
  });
}


// // slug categories

// // slug alternatif`
// const nama = document.querySelector('#nama')
// // const slug = document.querySelector('#slug')

// nama.addEventListener('change', function () {
//   let preslug = nama.value
//   preslug = preslug.replace(/ /g, '-')
//   slug.value = preslug.toLowerCase()
// })
