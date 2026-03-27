function LikeDislike({ id }) {
  const [likes, setLikes] = React.useState(0);
  const [dislikes, setDislikes] = React.useState(0);

  React.useEffect(() => {
    fetch(`react.php?id=${id}`)
      .then(res => res.json())
      .then(data => {
        setLikes(data.likes || 0);
        setDislikes(data.dislikes || 0);
      })
      .catch(err => console.error("Error loading likes:", err));
  }, [id]);

  function handleLike() {
    const newLikes = likes + 1;
    setLikes(newLikes);
    updateServer(newLikes, dislikes);
  }

  function handleDislike() {
    const newDislikes = dislikes + 1;
    setDislikes(newDislikes);
    updateServer(likes, newDislikes);
  }

  function updateServer(newLikes, newDislikes) {
    fetch("react.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify({ id, likes: newLikes, dislikes: newDislikes }),
    })
    .catch(err => console.error("Error updating likes:", err));
  }

  return (
    <div className="buttons" style={{ marginTop: "0.5rem" }}>
      <button className="like" onClick={handleLike}>
        👍 Like ({likes})
      </button>
      <button className="dislike" onClick={handleDislike}>
        👎 Dislike ({dislikes})
      </button>
    </div>
  );
}

// Mount LikeDislike under each .react-buttons div
document.querySelectorAll(".react-buttons").forEach((el, index) => {
  const root = ReactDOM.createRoot(el);
  root.render(<LikeDislike id={index + 1} />);
});
