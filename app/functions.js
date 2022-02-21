export async function sendForm(form, url) {
  const formData = new FormData(form);
  const response = await fetch(url, {
    method: "POST",
    body: formData,
  });
  return response.json();
}
