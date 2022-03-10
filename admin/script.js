function accpet(id, roll) {
  const form = document.getElementById(id);
  const select = form.querySelector("select");
  const value = select.value;
  console.log(value);
  console.log(roll);
  console.log(id);
  window.location.href = `http://localhost/lms/admin/accept.php?id1=${id}&id2=${roll}&id3=${value}`;
}
