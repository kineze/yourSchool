if (document.querySelector("[choices-select]")) {
  var choices = document.querySelectorAll("[choices-select]");
  choices.forEach(choice => {
    const example = new Choices(choice);
  });
}

if (document.getElementById("choices-gender")) {
  var gender = document.getElementById("choices-gender");
  const example = new Choices(gender);
}

if (document.getElementById("choices-inquriy")) {
  var inquiry = document.getElementById("choices-inquriy");
  const example = new Choices(inquiry);
}

if (document.getElementById("choices-blood-group")) {
  var bloodGroup = document.getElementById("choices-blood-group");
  const example = new Choices(bloodGroup );
}

if (document.getElementById("choices-classes")) {
  var schoolClass = document.getElementById("choices-classes");
  const example = new Choices(schoolClass, {
    searchEnabled: false,
  });
}

if (document.getElementById("choices-medium")) {
  var medium = document.getElementById("choices-medium");
  const example = new Choices(medium, {
    searchEnabled: false,
  });
}


if (document.getElementById("choices-language")) {
  var language = document.getElementById("choices-language");
  const example = new Choices(language);
}

if (document.getElementById("choices-consultant")) {
  var consultant = document.getElementById("choices-consultant");
  const example = new Choices(consultant);
}

if (document.getElementById("choices-role")) {
  var role = document.getElementById("choices-role");
  const example = new Choices(role);
}

if (document.getElementById("choices-religion")) {
  var religion = document.getElementById("choices-religion");
  const example = new Choices(religion);
}

if (document.getElementById("choices-orphan")) {
  var orphan = document.getElementById("choices-orphan");
  const example = new Choices(orphan);
}

if (document.getElementById("choices-timeSlot")) {
  var timeSlot = document.getElementById("choices-timeSlot");
  const example = new Choices(timeSlot);
}

if (document.getElementById("choices-timeSlot2")) {
  var timeSlot2 = document.getElementById("choices-timeSlot2");
  const example = new Choices(timeSlot2);
}

if (document.getElementById("choices-skills")) {
  var skills = document.getElementById("choices-skills");
  const example = new Choices(skills, {
    delimiter: ",",
    editItems: true,
    maxItemCount: 5,
    removeItemButton: true,
    addItems: true,
  });
}

if (document.getElementById("choices-disease")) {
  var disease = document.getElementById("choices-disease");
  const example = new Choices(disease, {
    removeItemButton: true, // Enable remove button for selected items
    maxItemCount: -1,       // Allow unlimited selections
    searchResultLimit: 5,   // Show up to 5 search results
    renderChoiceLimit: 5    // Show up to 5 selected items
  });
}

if (document.getElementById("choices-year")) {
  var year = document.getElementById("choices-year");
  setTimeout(function () {
    const example = new Choices(year);
  }, 1);

  for (y = 1900; y <= 2022; y++) {
    var optn = document.createElement("OPTION");
    optn.text = y;
    optn.value = y;

    if (y == 2022) {
      optn.selected = true;
    }

    year.options.add(optn);
  }
}

if (document.getElementById("choices-day")) {
  var day = document.getElementById("choices-day");
  setTimeout(function () {
    const example = new Choices(day);
  }, 1);

  for (y = 1; y <= 31; y++) {
    var optn = document.createElement("OPTION");
    optn.text = y;
    optn.value = y;

    if (y == 3) {
      optn.selected = true;
    }

    day.options.add(optn);
  }
}

if (document.getElementById("choices-month")) {
  var month = document.getElementById("choices-month");
  setTimeout(function () {
    const example = new Choices(month);
  }, 1);

  var d = new Date();
  var monthArray = new Array();
  monthArray[0] = "January";
  monthArray[1] = "February";
  monthArray[2] = "March";
  monthArray[3] = "April";
  monthArray[4] = "May";
  monthArray[5] = "June";
  monthArray[6] = "July";
  monthArray[7] = "August";
  monthArray[8] = "September";
  monthArray[9] = "October";
  monthArray[10] = "November";
  monthArray[11] = "December";
  for (m = 0; m <= 11; m++) {
    var optn = document.createElement("OPTION");
    optn.text = monthArray[m];
    // server side month start from one
    optn.value = m + 1;
    // if june selected
    if (m == 4) {
      optn.selected = true;
    }
    month.options.add(optn);
  }
}

if (document.getElementById("choices-questions")) {
  var element = document.getElementById("choices-questions");
  const example = new Choices(element);
}

if (document.getElementById("choices-multiple-remove-button")) {
  var choices = document.getElementById("choices-multiple-remove-button");
  const example = new Choices(choices, {
    delimiter: ",",
    editItems: true,
    maxItemCount: 5,
    removeItemButton: true,
    addItems: true,
  });
}

if (document.getElementById('choices-country')) {
  var country = document.getElementById('choices-country');
  const example = new Choices(country);
}

if (document.getElementById('choices-category')) {
  var element = document.getElementById('choices-category');
  const example = new Choices(element, {
    searchEnabled: false
  });
};

