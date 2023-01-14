export default function useValidatedForm(form, errors) {

  fields = form.map(function(obj){
    Object.keys(obj).map(function(key) {
      return obj[key];
    })
  })

  errors = errors.map(function(obj){
    Object.keys(obj).map(function(key) {
      return obj[key];
    })
  })

  fields.forEach(field => {
    const isValidFormTitle = computed(() => {
      return form.title === '' && errors.value.title !== null
    })
  });
  const isValidFormTitle = computed(() => {
    return form.title === '' && errors.value.title !== null
  })



  // const onReset = async () => {
  //   resetForm()
  //   resetValidation()
  // }

  // const resetForm = () => {
  //   form.title = props.event?.title ?? null
  //   form.image = props.event?.image ?? null
  //   form.date = props.event?.date ?? null
  //   form.duration = props.event?.duration ?? null
  //   form.description = props.event?.description ?? null
  // }

  // const resetValidation = () => {
  //   errors.value.image = null
  //   errors.value.title = null
  //   errors.value.date = null
  //   errors.value.duration = null
  //   errors.value.description = null
  // }



  return {}
})
