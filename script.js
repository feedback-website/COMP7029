const container = document.querySelector(".container");

const title = document.createElement("h2");
title.classList.add("title");
title.textContent = "Student Module Evaluation Form";
container.appendChild(title);

const questions = [
    "Are you satisfied with the module leader?",
    "Are all your doubts cleared from time to time?",
    "Do you want to include any new area/topic to the existing syllabus?",
    "Are practical sessions helpful/is the module leader helpful?",
    "Has all the content of the topic been delivered?",
    "Are you satisfied with the content of this module?",
    "Is the criteria for evaluating students for this module appropriate?",
];

const form = document.createElement("form");

questions.forEach((questionText, questionIndex) => {
    const questionBox = document.createElement("div");
    questionBox.classList.add("question-box");

    const questionDiv = document.createElement("div");
    questionDiv.classList.add("question");

    const questionP = document.createElement("p");
    questionP.textContent = questionText;
    questionDiv.appendChild(questionP);

    const emojiContainer = document.createElement("div");
    emojiContainer.classList.add("emoji-container");

    for (let i = 1; i <= 5; i++) {
        const input = document.createElement("input");
        input.type = "radio";
        input.name = `q${questionIndex + 1}`;
        input.id = `q${questionIndex + 1}-${i}`;
        input.value = i.toString();
        if (i === 1) input.required = true;
        emojiContainer.appendChild(input);

        const label = document.createElement("label");
        label.setAttribute("for", `q${questionIndex + 1}-${i}`);
        label.classList.add("emoji");
        label.classList.add(`emoji-${i}`);
        emojiContainer.appendChild(label);
    }

    questionDiv.appendChild(emojiContainer);
    questionBox.appendChild(questionDiv);
    form.appendChild(questionBox);
});

const suggestionBox = document.createElement("div");
suggestionBox.classList.add("question-box");

const suggestionLabel = document.createElement("p");
suggestionLabel.textContent = "Do you have any suggestions for the module leader?";
suggestionLabel.classList.add("suggestion-label");
suggestionBox.appendChild(suggestionLabel);

const suggestionTextarea = document.createElement("textarea");
suggestionTextarea.classList.add("suggestion-textarea");
suggestionTextarea.rows = 5;
suggestionBox.appendChild(suggestionTextarea);

form.appendChild(suggestionBox);

const submitButton = document.createElement("button");
submitButton.type = "submit";
submitButton.classList.add("submit-button");
submitButton.textContent = "Submit";
form.appendChild(submitButton);

form.addEventListener("submit", (event) => {
    event.preventDefault();
    form.style.display = "none";

    const thankYouDiv = document.createElement("div");
    thankYouDiv.classList.add("thank-you");
    thankYouDiv.textContent = "Thank you for submitting your feedback!";
    container.appendChild(thankYouDiv);
});

container.appendChild(form);
