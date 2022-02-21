export async function sendForm(form, url) {
  const formData = new FormData(form);
  const response = await fetch(url, {
    method: "POST",
    body: formData,
  });
  return response.json();
}

export async function getResponse(url, id) {
  if (id) {
    const response = await fetch(url, {
      method: "POST",
      body: `id=${id}`,
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
    });
    return response.json();
  } else {
    const response = await fetch(url);
    return response.json();
  }
}
