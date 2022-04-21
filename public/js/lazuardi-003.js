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

// const brand = document.querySelector('#brand')
// const models = document.querySelector('#models')

// brand.addEventListener('change', function () {
//   fetch('/dashboard/unit/getmodels?brand=' + brand.value)
//     .then((response) => response.json())
//     .then((response) => {
//       const m = response
//       let card = '<option>---Pilih Models---</option>'
//       m.forEach(
//         (m) => (card += '<option value="' + m.id + '">' + m.name + '</option>'),
//       )
//       models.innerHTML = card
//     })
// })
// // slug categories

// // slug alternatif`
// const nama = document.querySelector('#nama')
// // const slug = document.querySelector('#slug')

// nama.addEventListener('change', function () {
//   let preslug = nama.value
//   preslug = preslug.replace(/ /g, '-')
//   slug.value = preslug.toLowerCase()
// })
