const BlockVerification = (
  currentRating,
  approvedNo,
  disapprovedNo,
  approvedRating,
  disapprovedRating,
  milestone,
  status,
  userCryptoCredits
) => {
  var Decision = false;
  if (currentRating <= 5) {
    disapprovedNo = disapprovedNo + 1;
    disapprovedRating = disapprovedRating + currentRating;
  } else {
    approvedNo = approvedNo + 1;
    approvedRating = approvedRating + currentRating;
  }

  if (approvedNo >= milestone) {
    Decision = true;
    status = 1;
  } else if (disapprovedNo >= milestone) {
    Decision = true;
    status = 0;
  }

  if (Decision) {
    if (status) {
      userCryptoCredits = userCryptoCredits + approvedRating;
    } else {
      userCryptoCredits =
        userCryptoCredits -
        (disapprovedRating * disapprovedNo) / (2 * milestone);
    }
  }
  return (result = {
    currentRating: currentRating,
    approvedNo: approvedNo,
    disapprovedNo: disapprovedNo,
    approvedRating: approvedRating,
    disapprovedRating: disapprovedRating,
    milestone: milestone,
    status: status,
    userCryptoCredits: userCryptoCredits
  });
};

//test

// console.log(BlockVerification(4, 3, 5, 12, 35, 6, 0, 100));
