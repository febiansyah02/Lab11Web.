<?php
class Form
{
    private $fields = [];
    private $action;
    private $submit;

    public function __construct($action, $submit)
    {
        $this->action = $action;
        $this->submit = $submit;
    }

    public function addField($name, $label, $type = "text", $options = [])
    {
        $this->fields[] = [
            'name' => $name,
            'label' => $label,
            'type' => $type,
            'options' => $options
        ];
    }

    public function displayForm()
    {
        echo "<form method='POST' action='{$this->action}'>";
        echo "<table>";

        foreach ($this->fields as $field) {
            echo "<tr><td>{$field['label']}</td><td>";

            switch ($field['type']) {
                case 'textarea':
                    echo "<textarea name='{$field['name']}'></textarea>";
                    break;

                default:
                    echo "<input type='{$field['type']}' name='{$field['name']}'>";
            }

            echo "</td></tr>";
        }

        echo "<tr><td colspan='2'>
                <button type='submit'>{$this->submit}</button>
              </td></tr>";

        echo "</table></form>";
    }
}
