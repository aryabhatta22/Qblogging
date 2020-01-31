const createFirstBlog = (data, title, userid, profession, facultySize) => {
  var status = 0;
  var milestone = 0;
  var today = new Date();
  if (profession == "faculty") {
    status = 1;
    milestone = 0;
  } else {
    status = 0;
    milestone = Math.floor((facultySize * 10) / 2) + 1;
  }

  return (dataBlock = {
    Data: data,
    Title: title,
    Timestamp:
      today.getFullYear() +
      "-" +
      (today.getMonth() + 1) +
      "-" +
      today.getDate(),
    Userid: userid,
    Status: status,
    Disapproved: 0,
    Approved: 0,
    Milestone: milestone
  });
};

console.log(
  createFirstBlog(
    "This is the data",
    "this is the title",
    "Fa233",
    "student",
    5
  )
);
